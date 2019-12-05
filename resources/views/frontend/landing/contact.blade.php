<!-- Contact With Us -->
<div class="contact-us message_us mt-5 " id="contact_with_us" dir="rtl">
    <header class="p-4">
        <h3>تواصل معنا</h3>
        <div style="max-width: 100px">
            <hr style="border: 1px solid #fc0">
        </div>
    </header>
    <div class="container wow bounceInUp">
        <div class="row">
            <div class="col-sm-6">
                <p>
                    <i class="fa fa-send fa-2x mr-2"></i> بني مزار - شارع المحطة - بجوار برج الفيروز
                </p>
                <p>
                    <i class="fa fa-envelope fa-2x mr-2"></i> email@gmail.com
                </p>
                <p>
                    <i class="fa fa-phone fa-2x mr-2"></i> 01021567789
                </p>
            </div>

            <div class="col-sm-6 seperator mb-5">
                <form action="{{ route('contact.send') }}" method="POST" id="formContact">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="الاسم">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="البريد الالكتروني">
                    </div>

                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="الهاتف">
                    </div>

                    <div class="form-group">
                        <textarea type="text" name="message" class="form-control" placeholder="الرسالة"></textarea>
                    </div>

                    <button id="btnSubmit" class="btn btn-warning btn-block" style="text-shadow: 1px 1px 1px #000">
                        إرسال
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

@push('script')
<script>
    $('#formContact').on('submit', function (e) {
        e.preventDefault();

        $('#btnSubmit').attr('disabled', true);

        let form = $(this);
        let data = form.serialize();
        let action = form.attr('action');

        $.ajax({
            url: action,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                toastr.success('تم الارسال بنجاح');
                form[0].reset();
                $('#btnSubmit').attr('disabled', false);
            },
            error: function(response) {
                let message = '';

                $.each(response.responseJSON.errors, function(key, value) {
                    if (Array.isArray(value)) {
                        $.each(value, function(k, v) {
                            message += `${v} <br>`;
                        });
                    } else {
                        message += `${value} <br>`;
                    }
                });

                $('#btnSubmit').attr('disabled', false);

                toastr.error(message);
            }
        })

    });
</script>
@endpush
