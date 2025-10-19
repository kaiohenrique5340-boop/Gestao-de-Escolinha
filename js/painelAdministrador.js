 const usuarioBtn = document.getElementById('usuario-btn');
    const submenu = document.getElementById('submenu-usuario');

    usuarioBtn.addEventListener('click', () => {
        submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
    });

    // Fecha o submenu se clicar fora dele
    window.addEventListener('click', function(e) {
        if (!usuarioBtn.contains(e.target) && !submenu.contains(e.target)) {
            submenu.style.display = 'none';
        }
    });