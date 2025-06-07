$(document).ready(function() {
    // Máscara para o celular
    $("#celular").mask("(00) 0 0000-0000");

    // Smooth scroll para links de âncora
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.hash); // Pega o ID do hash (#nome-da-secao)

        if (target.length) { // Verifica se o elemento com o ID existe
            event.preventDefault(); // Impede o comportamento padrão de "salto"
            $('html, body').animate({
                scrollTop: target.offset().top // Rola suavemente até o elemento
            }, 1000); // Duração da animação em milissegundos (1 segundo)
        }
    });

    // Código para o botão "Voltar ao Início"
    var btnToTop = $('#btn-to-top');

    $(window).scroll(function() {
        // Mostra ou esconde o botão dependendo da posição de rolagem
        if ($(window).scrollTop() > 300) { // Mostra o botão após rolar 300px
            btnToTop.addClass('show');
        } else {
            btnToTop.removeClass('show');
        }
    });

    btnToTop.on('click', function(e) {
        e.preventDefault(); // Impede o comportamento padrão do botão
        $('html, body').animate({
            scrollTop: 0 // Rola para o topo da página (0px)
        }, 800); // Duração da animação em milissegundos (0.8 segundos)
    });
});