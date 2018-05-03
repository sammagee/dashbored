if (process.env.NODE_ENV === 'production') {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('sw.js');
    }
}
