document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-dados');
    const resultado = document.getElementById('resultado');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // evita envio HTTP
        const nome = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();

        if (!nome || !email) {
            resultado.innerHTML = '<div class="alert alert-warning">Preencha nome e email.</div>';
            return;
        }

        resultado.innerHTML =
            '<div class="alert alert-success">' +
            '<strong>Dados digitados:</strong><br>' +
            'Nome: ' + escapeHtml(nome) + '<br>' +
            'Email: ' + escapeHtml(email) +
            '</div>';
    });

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});