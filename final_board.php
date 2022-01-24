<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="normalize.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="pin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="modal.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="final_board.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="navigation_bar">
        <div class="pint_mock_icon_container add_pin">
            <img src="add.png" alt="add_pin" class="pint_mock_icon">
        </div>
    </div>

    <div onclick="" class="pin_container"></div>

    <div class="add_pin_modal">
        <div class="add_pin_container">
            <div class="side" id="left_side">
                <div class="section1">
                    <div class="pint_mock_icon_container">
                        <img src="ellipse.png" alt="edit" class="pint_mock_icon">
                    </div>
                </div>

                <div class="section2">
                    <label for="upload_img" id="upload_img_label">
                        <div class="upload_img_container">
                            <div id="dotted_border">
                                <div class="pint_mock_icon_container">
                                    <img src="up-arrow.png" alt="upload_img" class="pint_mock_icon">
                                </div>
                                <div>Click to upload</div>
                                <div>Recommendation: Use high-quality .jpg files less than 20MB</div>
                            </div>
                        </div>
                        <input type="file" name="upload_img" id="upload_img">
                    </label>

                    <div class="modals_pin">
                        <div class="pin_image">
                            <!-- <img src="" alt="pin_image"> -->
                        </div>
                    </div>
                </div>

                <div class="section3">
                    <div class="save_from_site">Save From Site</div>
                </div>
            </div>

            <div class="side" id="right_side">
                <div class="section1">
                    <div class="select_size">
                        <select name="pin_size" id="pin_size">
                            <option value="" disabled selected>Select</option>
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option value="large">large</option>
                        </select>
                        <div class="save_pin">Save</div>
                    </div>
                </div>

                <div class="section2">
                    <input placeholder="Add your title" type="text" class="new_pin_input" id="pin_title">
                    <input placeholder="Tell everyone what your Pin is about" type="text" class="new_pin_input" id="pin_description">
                      <input placeholder="Add a destination link" type="text" class="new_pin_input" id="pin_destination">
                </div>
            </div>
        </div>
    </div>

    <script src="./scripts/final_board.js"></script>
</body>

</html>
<script>
const add_pin_modal = document.querySelector('.add_pin_modal');

document.querySelector('.add_pin').addEventListener('click', () => {
    add_pin_modal.style.opacity = 1;
    add_pin_modal.style.pointerEvents = 'all';
});

document.querySelector('.add_pin_modal').addEventListener('click', event => {
    if (event.target === add_pin_modal) {
        reset_modal();
    }
});

let pin_image_blob = null;

document.querySelector('#upload_img').addEventListener('change', event => {
    if (event.target.files && event.target.files[0]) {
        if (/image\/*/.test(event.target.files[0].type)) {
            const reader = new FileReader();

            reader.onload = function () {
                const new_image = new Image();

                new_image.src = reader.result;
                pin_image_blob = reader.result;

                new_image.onload = function () {
                    const modals_pin = document.querySelector('.add_pin_modal .modals_pin');

                    new_image.classList.add('pin_max_width');

                    document.querySelector('.add_pin_modal .pin_image').appendChild(new_image);
                    document.querySelector('#upload_img_label').style.display = 'none';

                    modals_pin.style.display = 'block';

                    if (
                        new_image.getBoundingClientRect().width < new_image.parentElement.getBoundingClientRect().width ||
                        new_image.getBoundingClientRect().height < new_image.parentElement.getBoundingClientRect().height
                    ) {
                        new_image.classList.remove('pin_max_width');
                        new_image.classList.add('pin_max_height');
                    }

                    modals_pin.style.opacity = 1;
                }
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    }

    document.querySelector('#upload_img').value = '';
});

document.querySelector('.save_pin').addEventListener('click', () => {
    const users_data = {
        author: 'Jack',
        board: 'default',
        title: document.querySelector('#pin_title').value,
        description: document.querySelector('#pin_description').value,
        destination: document.querySelector('#pin_destination').value,
        img_blob: pin_image_blob,
        pin_size: document.querySelector('#pin_size').value
    }

    create_pin(users_data);
    reset_modal();
});


function create_pin(pin_details) {
    const new_pin = document.createElement('DIV');
    const new_image = new Image();

    new_image.src = pin_details.img_blob;
    new_pin.style.opacity = 0;

    new_image.onload = function () {
        new_pin.classList.add('card');
        new_pin.classList.add(`card_${pin_details.pin_size}`);
        new_image.classList.add('pin_max_width');

        new_pin.innerHTML = `<div  style="margin-top:500px;"class="pin_title">${pin_details.title}</div>
<div class="pin_modal">
    <div class="modal_head">
       
    </div>
    <div class="modal_foot">
        <div class="destination">
           
            <span>${pin_details.destination}</span>
        </div>
        <div class="pint_mock_icon_container">
            <img src="send.png" alt="send" class="pint_mock_icon">
        </div>
        <div class="pint_mock_icon_container">
            <img src="ellipse.png" alt="edit" class="pint_mock_icon">
        </div>
    </div>
</div>
<div class="pin_image">
</div>`;

        document.querySelector('.pin_container').appendChild(new_pin);
        new_pin.children[2].appendChild(new_image);

        if (
            new_image.getBoundingClientRect().width < new_image.parentElement.getBoundingClientRect().width ||
            new_image.getBoundingClientRect().height < new_image.parentElement.getBoundingClientRect().height
        ) {
            new_image.classList.remove('pin_max_width');
            new_image.classList.add('pin_max_height');
        }

        new_pin.style.opacity = 1;
    }
}


function reset_modal() {
    const modals_pin = document.querySelector('.add_pin_modal .modals_pin');

    add_pin_modal.style.opacity = 0;
    add_pin_modal.style.pointerEvents = 'none';
    document.querySelector('#upload_img_label').style.display = 'block';
    modals_pin.style.display = 'none';
    modals_pin.style.opacity = 0;	

    if (modals_pin.children[0].children[0]) modals_pin.children[0].removeChild(modals_pin.children[0].children[0]);
    document.querySelector('#pin_title').value = '';
    document.querySelector('#pin_description').value = '';
    document.querySelector('#pin_destination').value = '';
    document.querySelector('#pin_size').value = '';
    pin_image_blob = null;
}

</script>
<script type="text/javascript">
    document.getElementById("pin_container").onclick = function () {
        location.href = "www.youtube.com";
    };
</script>