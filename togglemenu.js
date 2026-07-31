export default function togglemenu(menuId) {
    // Menülerin açılıp kapanması için fonksiyon
    function toggleMenu(menuId) {
        var menu = document.getElementById(menuId);
        var allMenus = document.querySelectorAll('.menu');

        // Diğer tüm menüleri kapat
        allMenus.forEach(function (m) {
            if (m !== menu) {
                m.style.display = 'none';
            }
        });

        // Tıklanan menü varsa aç, yoksa kapat
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none';
        }
    }
}