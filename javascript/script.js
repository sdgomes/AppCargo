$(document).ready(function() {

    $(document).on('click', 'button, i, ul>li, a', function() {
        try {
            window.navigator.vibrate(50)
        } catch (error) {}
    });
    $(document).on('click', 'li.senha', function() {
        if ($('.change-pass').length == 0) {
            $('#mask').show();
            $(this).parent().find('.active').removeClass('active').addClass('stopped');
            $(this).addClass('active')
            $('.standard').hide()
            $('#banner-stand, #password').append(
                '<div><div class="change-pass">' +
                '<button class="times"><i class="far fa-times"></i></button>' +
                '<div class="banner px-4">' +
                '<form action="" method="post">' +
                '<div class="row mt-2 align-items-end">' +
                '<label class="text-primary">Digite sua senha antiga:</label>' +
                '<div class="form-group form-group-g w-100">' +
                '<input placeholder="***********" type="password" class="eye" name="">' +
                '<span class="pl-2" style="cursor: pointer" id="see-eye"><i class="fas fa-eye"></i></span>' +
                '</div>' +
                '</div>' +
                '<div class="row mt-2 align-items-end">' +
                '<label>Nova senha</label>' +
                '<div class="form-group w-100">' +
                '<input placeholder="***********" type="password" class="eye" name="">' +
                '</div>' +
                '</div>' +
                '<div class="row mt-2 align-items-end">' +
                '<label>Confirme a nova senha</label>' +
                '<div class="form-group w-100">' +
                '<input placeholder="***********" type="password" class="eye" name="">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="shadow action-area pass">' +
                '<button type="submit" class="d-block" id="changepass">Confirmar</button>' +
                '</form></div></div></div>');
        }
    });


    $(document).on('click', '#see-eye', function() {
        $(this).find("i").toggleClass('fa-eye-slash fa-eye');
        $('.eye').attr('type', $('.eye').attr('type') == 'password' ? "text" : "password");
    });

    $(document).on('click', '#changepass, .times', function() {
        $('li.senha').removeClass('active')
        $('li.stopped').toggleClass('stopped active')
        $(".change-pass").remove();
        $("#password").empty();
        $('.standard').show()
        $('#mask').hide();

    });



    $(document).on('click', '[name="showInfo"]', function() {
        $('.comments').removeClass('d-none')
        $('#mask').show();
    });

    $('#mask').click(function() {
        $("#password").empty();
        $('li.senha').removeClass('active')
        $('li.stopped').toggleClass('stopped active')
        $(".change-pass").remove();
        $('.standard').show()
        $('.comments').addClass('d-none')
        $(this).hide();
    });
});