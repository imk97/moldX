export default function switchmode() {
    // Dark Mode Switch
    const switchMode = document.getElementById('switch-mode');

    switchMode.addEventListener('change', function () {
        console.log("hello")
        if (this.checked) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }
    })
}