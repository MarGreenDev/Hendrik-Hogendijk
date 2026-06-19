const modal = document.getElementById('addModal');

document.getElementById('openModal').addEventListener('click', () => {
    modal.classList.add('actief');
});

document.getElementById('closeModal').addEventListener('click', () => {
    modal.classList.remove('actief');
});

// sluit ook als je buiten het venster klikt
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('actief');
    }
});