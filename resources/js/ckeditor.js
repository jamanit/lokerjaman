import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

const editor1Element = document.querySelector('.ckeditor1');
if (editor1Element) {
    ClassicEditor
        .create(editor1Element)
        .catch(error => {
            console.error(error);
        });
}

const editor2Element = document.querySelector('.ckeditor2');
if (editor2Element) {
    ClassicEditor
        .create(editor2Element)
        .catch(error => {
            console.error(error);
        });
}

const editor3Element = document.querySelector('.ckeditor3');
if (editor3Element) {
    ClassicEditor
        .create(editor3Element)
        .catch(error => {
            console.error(error);
        });
}