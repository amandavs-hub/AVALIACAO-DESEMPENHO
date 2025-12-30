const form = document.getElementById('avaliacaoForm');
form.addEventListener('submit', function(e){
    const selects = form.querySelectorAll('select');
    for (let s of selects) {
        if (s.value === '') {
            alert('Por favor, responda todas as notas.');
            e.preventDefault();
            return;
        }
    }
});