import * as FilePond from 'filepond'
import 'filepond/dist/filepond.min.css'

import FilePondPluginImagePreview from 'filepond-plugin-image-preview'
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css'

FilePond.registerPlugin(FilePondPluginImagePreview)

document.addEventListener("DOMContentLoaded", function(event) {
  const input = document.getElementById('images')
  const images = document.getElementById('defaultImages')
  const csrfElem = document.getElementById('csrf-token');

  if (!!input) {
    const pond = FilePond.create(input, {
      multiple: true,
      name: 'images',
      imagePreviewHeight: 100,
      imageCropAspectRatio: '1:1',
    })
  
    if (!!images) {
      const value = images?.value
      const arr = !!value ? value?.split(',') : []
      pond.addFiles(arr)
    }

    if(!!csrfElem) {
      const csrf = csrfElem.textContent
  
      pond.setOptions({
        server: {
          process: '/admin/upload',
          revert: '/admin/revert',
          headers: {
            'X-CSRF-TOKEN': csrf
          },
        },
      });
    }
  
    document.addEventListener('FilePond:processfiles', e => {
      const filePondData = document.querySelector('.filepond--data')
      filePondData?.childNodes.forEach(elem => {
        elem.setAttribute('name', 'images[]')
      })
    })
  }
});
