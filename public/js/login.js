$('.user_login .btnNext').click(function(){
    $('.user_login .nav-tabs > .active').next('li').find('a').trigger('click');
});

$('.user_login .btnPrevious').click(function(){
    $('.user_login .nav-tabs > .active').prev('li').find('a').trigger('click');
});

var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
    var dataURL = reader.result;
    var output = document.querySelector('.Img_input_Wrapper_Upload');
    
    output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};


