export default function notificationmenutoggle() {
    // console.log("toggle notification")
    // Notification Menu Toggle
    document.querySelector('.notification').addEventListener('click', function () {
        console.log("notification")
        document.querySelector('.notification-menu').classList.toggle('show');
        document.querySelector('.profile-menu').classList.remove('show'); // Close profile menu if open
    });
}