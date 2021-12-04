import * as FilePond from 'filepond'
import 'filepond/dist/filepond.min.css'

import FilePondPluginImagePreview from 'filepond-plugin-image-preview'
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css'

FilePond.registerPlugin(FilePondPluginImagePreview)

const input = document.getElementById('images')
const images = document.getElementById('defaultImages')

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
}
