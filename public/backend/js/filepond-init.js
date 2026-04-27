FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);

window.createFilePond = function(selector, options = {}) {
    const element = document.querySelector(selector);
    if (!element) return null;

    const defaults = {
        allowMultiple: false,
        acceptedFileTypes: ['image/jpeg', 'image/png', 'image/webp'],
        maxFileSize: '2MB',
        labelIdle: `<span class="filepond--label-action">Browse</span> or drag & drop`,
        imagePreviewHeight: 200,
        server: null,
        instantUpload: false,
        allowProcess: false,
        storeAsFile: true,
    };

    return FilePond.create(element, { ...defaults, ...options });
};