const BASE_URL = 'http://127.0.0.1:8000/product/'
const ASSET_URL = 'http://127.0.0.1:8000/storage/'

function deleteRequest(id) {
    $.ajax({
        url: BASE_URL + id,
        type: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            iziToast.success({
                title: 'OK',
                message: response,
            });
            $('#product-' + id).remove();
        },
        error: function(err) {
            iziToast.error({
                title: 'Error : ',
                message: err.responseText.slice(0, 50),
            });
        }
    });
}

const nameInput = document.getElementById("name")
const priceInput = document.getElementById("price")
const quantityInput = document.getElementById("quantity")
const picture_pathInput = document.getElementById("picture_path")
const spesificationInput = document.getElementById("spesification")
const descriptionInput = document.getElementById("description")
const picturePreview = document.getElementById("picture_preview")
const picturePreviewImg = picturePreview.children[0]

const form = document.getElementById("product-add-form")
const formBtn = document.getElementById("form-btn")
const formMethod = document.getElementById("_method")

function showModalEdit(id) {

    form.setAttribute('action', BASE_URL + id)
    formMethod.value = 'PUT'
    formBtn.innerText = 'Update'

    $.ajax({
        url: `${BASE_URL + id}/edit`,
        type: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response);
            nameInput.value = response.name
            priceInput.value = response.price
            quantityInput.value = response.quantity
            // picture_pathInput.value = response.picture_path
            spesificationInput.value = response.spesification
            descriptionInput.value = response.description

            if (response.picture_path.indexOf("http") == 0) {
                picturePreviewImg.src = response.picture_path
            } else {
                picturePreviewImg.src = ASSET_URL + response.picture_path
            }

        },
        error: function(err) {
            iziToast.error({
                title: 'Error : ',
                message: err.responseText.slice(0, 50),
            });
        }
    });

    picturePreview.classList.remove('hidden')

}

const resetForm = () => {
    nameInput.value = ''
    priceInput.value = ''
    quantityInput.value = ''
    picture_pathInput.value = ''
    spesificationInput.value = ''
    descriptionInput.value = ''

    form.setAttribute('action', BASE_URL)
    formMethod.value = 'POST'
    formBtn.innerText = 'Submit'
    picturePreview.classList.add('hidden')

}

function showToast(id) {
    iziToast.show({
        theme: 'dark',
        icon: 'icon-person',
        title: 'Hey',
        message: 'Sure to Delete Product ? id: ' + id,
        position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        progressBarColor: 'rgb(0, 255, 184)',
        buttons: [
            ['<button>Ok</button>', function(instance, toast) {

                instance.hide({
                    transitionOut: 'fadeOutUp',
                    onClosing: function(instance, toast, closedBy) {
                        console.info('closedBy: ' + closedBy);
                        deleteRequest(id)
                    }
                }, toast, 'success');

            }, true], // true to focus

            ['<button>Close</button>', function(instance, toast) {
                instance.hide({
                    transitionOut: 'fadeOutUp',
                    onClosing: function(instance, toast, closedBy) {
                        console.info('closedBy: ' +
                            closedBy
                        ); // The return will be: 'closedBy: success'
                    }
                }, toast, 'success');
            }]
        ],
        onOpening: function(instance, toast) {
            console.info('callback abriu!');
        },
        onClosing: function(instance, toast, closedBy) {
            console.info('closedBy: ' +
                closedBy); // tells if it was closed by 'drag' or 'button'
        }
    });

}

function productStore() {
    form.submit();
}

