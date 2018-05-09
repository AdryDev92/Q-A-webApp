$(function () {
    $('#send').on("click", validateAll);
    $('#name').on("change", validateName);
    $('#age').on("change", validateAge);
    $('#nick').on("change", validateNick())

});

function validateAll(e) {

    e.preventDefault();
    let button = $('button');
    button.prop("disabled", true);

    let nombreCorrecto = validateName();
    let edadCorrecta = validateAge();
    let nickCorrecto = validateNick();

    if (nombreCorrecto && edadCorrecta && nickCorrecto) {
        $('#formulario').submit();
    }

    button.prop("disabled", false);
}

function validateName() {
    let esCorrecto = false;
    let regex = /[a-zA-Z]+/;
    let name = $('#name').val();
    let input = $('#name');
    let error = $('#errorName');

    if (!name.match(regex) || name === "" || name.length < 4) {
        error.removeClass("is-valid");
        input.removeClass("is-valid");
        error.html("El formato de nombre es incorrecto. Mínimo 4 caracteres").addClass("text-danger");
        input.addClass("is-invalid");
    } else {
        error.removeClass("text-danger");
        input.removeClass("is-invalid");
        error.html("");
        input.addClass("is-valid");
        esCorrecto = true;
    }
    return esCorrecto;
}

function validateAge() {

    let esCorrecto = false;
    let edad = $('#age').val();
    let error = $('#errorAge');
    let regex = /[0-9]+/;

    if (edad.match(regex) >= 18) {
        error.html("");
        edad.addClass("valido");
        esCorrecto = true;
    } else {
        edad.removeClass("valido");
        edad.addClass('error');
        edad.html("");
        error.html("No eres mayor de edad").addClass("bg-danger");
    }

}

function validateNick() {
    let regex = /[a-zA-Z]+/;
    let nick = $('#nick').val();
    let input = $('#nick');
    let error = $('#errorNick');
    let esCorrecto = false;

    if (!nick.match(regex) || nick === "" || nick.length < 4) {
        error.removeClass("is-valid");
        input.removeClass("is-valid");
        error.html("El formato de nombre es incorrecto. Mínimo 4 caracteres").addClass("text-danger");
        input.addClass("is-invalid");
    } else {
        error.removeClass("text-danger");
        input.removeClass("is-invalid");
        error.html("");
        input.addClass("is-valid");
        esCorrecto = true;
    }
}

function validateEmail() {
    let email = $('#email');
    let error = $('#errorEmail');
}

