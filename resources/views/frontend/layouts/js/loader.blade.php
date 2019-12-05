<style>
    #_loader{
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0,0 , 0.5);
        text-align: center;
        z-index: 9999999999;
        padding: 15px;
        display: none;
    }
    #_loader img{
        width: 50vw;
        height: 50vh;
        max-width: 50%;
        max-height: 50%;
        margin: 0 auto;
    }
</style>

<div id="_loader">
    <img src="{{ asset('imgs/spiral_loader.svg') }}" alt="cart_loading">
</div>