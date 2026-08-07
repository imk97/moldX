import notificationmenutoggle from "./notificationmenutoggle.js";
import profilemenutoggle from "./profilemenutoggle.js";
import switchmode from "./switchmode.js";
import togglemenu from "./togglemenu.js";
import { initbtn } from "./login.js";

//   <script>
window.onload = () => {
    // const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

    // allSideMenu.forEach(item => {
    //     const li = item.parentElement;

    //     item.addEventListener('click', function () {
    //         allSideMenu.forEach(i => {
    //             i.parentElement.classList.remove('active');
    //         })
    //         li.classList.add('active');
    //     })
    // });

    // // // TOGGLE SIDEBAR
    // const menuBar = document.querySelector('nav .bx.bx-menu');
    // const sidebar = document.getElementById('sidebar');

    // // Sidebar toggle işlemi
    // menuBar.addEventListener('click', function () {
    //     sidebar.classList.toggle('hide');
    // });

    // // Sayfa yüklendiğinde ve boyut değişimlerinde sidebar durumunu ayarlama
    // function adjustSidebar() {
    //     if (window.innerWidth <= 576) {
    //         sidebar.classList.add('hide'); // 576px ve altı için sidebar gizli
    //         sidebar.classList.remove('show');
    //     } else {
    //         sidebar.classList.remove('hide'); // 576px'den büyükse sidebar görünür
    //         sidebar.classList.add('show');
    //     }
    // }

    // // Sayfa yüklendiğinde ve pencere boyutu değiştiğinde sidebar durumunu ayarlama
    // window.addEventListener('load', adjustSidebar);
    // window.addEventListener('resize', adjustSidebar);

    // // Arama butonunu toggle etme
    // const searchButton = document.querySelector('#content nav form .form-input button');
    // const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
    // const searchForm = document.querySelector('#content nav form');

    // searchButton.addEventListener('click', function (e) {
    //     if (window.innerWidth < 768) {
    //         e.preventDefault();
    //         searchForm.classList.toggle('show');
    //         if (searchForm.classList.contains('show')) {
    //             searchButtonIcon.classList.replace('bx-search', 'bx-x');
    //         } else {
    //             searchButtonIcon.classList.replace('bx-x', 'bx-search');
    //         }
    //     }
    // })
    initbtn()

    // Switch dark/light mode
    switchmode();

    //toggle menu
    togglemenu();

    notificationmenutoggle();

    profilemenutoggle();

    // Close menus if clicked outside
    window.addEventListener('click', function (e) {
        if (!e.target.closest('.notification') && !e.target.closest('.profile')) {
            document.querySelector('.notification-menu').classList.remove('show');
            document.querySelector('.profile-menu').classList.remove('show');
        }
    });


    // Başlangıçta tüm menüleri kapalı tut
    document.addEventListener("DOMContentLoaded", function () {
        var allMenus = document.querySelectorAll('.menu');
        allMenus.forEach(function (menu) {
            menu.style.display = 'none';
        });
    });
}
{/* </script> */ }