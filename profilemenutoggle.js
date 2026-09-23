export default function profilemenutoggle() {
    // Profile Menu Toggle
    document.querySelector('.profile').addEventListener('click', function () {
        console.log("profile")
        document.querySelector('.profile-menu').classList.toggle('show');
        document.querySelector('.notification-menu').classList.remove('show'); // Close notification menu if open
    });
}