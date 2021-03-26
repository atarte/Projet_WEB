// fihcier js commun à toutes nos pages
window.onload = installServiceWorkerAsync;

async function installServiceWorkerAsync() {

    if ('serviceWorker' in navigator) {
        try {
            let serviceWorker = await navigator.serviceWorker.register('/public/js/serviceWorker.js')
            console.log(`Service worker registered ${serviceWorker}`)
        } catch (err) {
            console.error(`Failed to register service worker: ${err}`)
        }
    }
}

// window.addEventListener("load", () => {
//     if ("serviceWorker" in navigator) {
//       navigator.serviceWorker.register("/public/js/serviceWorker.js");
//     }
// });
