function showToast(text, background) {
    Toastify({
        text: text,
        style: {
            background: background,
            top: "40px"
        },
        offset: {
            y: 60
        },
    }).showToast();
}
