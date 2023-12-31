ClassicEditor.defaultConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            '|',
            'bulletedList',
            'numberedList',
            '|',
            'imageUpload',
            '|',
            'undo',
            'redo'
        ]
    },
    image: {
        toolbar: [
            'imageStyle:full',
            'imageStyle:side',
            '|',
            'imageTextAlternative'
        ]
    },
    language: 'vi'
};

ClassicEditor.create(document.querySelector('#inputContent'));
ClassicEditor.create(document.querySelector('#inputRequirement'));
ClassicEditor.create(document.querySelector('#inputBenefit'));
ClassicEditor.create(document.querySelector('#inputCachThucUngTuyen'));

function setMinDate() {
    const inputStartTime = document.getElementById('inputStartTime');
    const inputEndTime = document.getElementById('inputEndTime');

    inputEndTime.setAttribute('min', inputStartTime.value);

}
