<?php

namespace App\Http\Controllers\Backend\Products;

use DB;
use App\Models\Products\Reservation;
use App\Http\Controllers\Backend\BackendController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class ReservationsController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Products\Reservation $reservation
     * @return void
     */
	public function activeStatus(Request $request)
	{
		$reserv=Reservation::find($request->id);
		$reserv->active=$request->oldValue;
		$reserv->save();
		 return response()->json();

	}
/*public function active($id,Request $request)
    {
        $reserv=Reservation::find($id);
    $reserv->active=item;
	//dd($reserv->active);	
	  $reserv->save();

	return redirect()->route('admin.reservations.index');

}
*/	     
    public function __construct(Reservation $reservation)
    {
        $this->model    = $reservation;
        $this->view     = "products.reservations";
        $this->singular = 'reservation';
        $this->plural   = 'reservations';
    }

    public function status($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = request()->status;

        if ( request()->status == "scheduled" )
        {
            $reservation->shipping_at = \Carbon\Carbon::now();
            $reservation->success_at  = null;
        } 
        elseif ( request()->status == "success" )
        {
            $reservation->success_at = \Carbon\Carbon::now();
        } 
        else
        {
            $reservation->shipping_at = null;
            $reservation->success_at  = null;
        }

        $reservation->save();

        return response()->json([
            'message' => 'Edited Successfully',
            'type' => 'success',
            'id'  => $reservation->id,
            'name' => $reservation->user->name,
            'status' => $reservation->status,
        ], 200);
    }

    /**
     * Display the orders analytics page 
     *
     * @return \Illuminate\Http\Resposne
     */
    public function analytics()
    {
        $orders = $this->orderQuery()->get();
        $success = $this->orderQuery()->where('status', '=', 'success')->get();
        $scheduled = $this->orderQuery()->where('status', '=', 'scheduled')->get();
        $pending = $this->orderQuery()->where('status', '=', 'pending')->get();

        $orders = json_encode($this->ordersToChartValues($orders));
        $success = json_encode($this->ordersToChartValues($success));
        $scheduled = json_encode($this->ordersToChartValues($scheduled));
        $pending = json_encode($this->ordersToChartValues($pending));

        return view('backend.products.reservations.analytics', compact('orders', 'success', 'scheduled', 'pending'));
    }


    /**
     * The basic order query used in analytics
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function orderQuery()
    {
        return DB::table('reservations')
            ->select(
                DB::raw('COUNT(id) as `count`'),
                DB::raw("MONTH(created_at) as `month`")
            )
            ->where(DB::raw("YEAR(created_at)"), '=', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'asc');
    }

    /**
     * Cobvert the order to chart accepted values
     *
     * @param  \Illuminate\Database\Eloquent\Collection $orders
     * @return array
     */
    private function ordersToChartValues($orders)
    {
        $data = [];
        foreach($orders as $order) {
            $data[] = [
                // 'month' => convertMonthIdToName($order->month),
                'month' => $order->month,
                'value' => $order->count
            ];
        }

        return $data;
    }

}
