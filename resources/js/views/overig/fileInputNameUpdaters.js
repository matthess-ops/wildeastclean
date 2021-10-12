//there is an error in updateCarouselimageinputname when images with the same name are uploaded

// updates file input field value with the filename of the selected filename by the user
const updateFileInputValue = (input, label) => {
    try {
        document.getElementById(input).addEventListener(
            "change",
            () => {
                const fileNameSplitted = document
                    .getElementById(input)
                    .value.split("\\");
                const fileName = fileNameSplitted[fileNameSplitted.length - 1];
                document.getElementById(label).innerHTML = fileName;
            },
            true
        );
    } catch (error) {
        console.log("input var with name " + input + " was not found");
    }
};

// update the carousel_images_input value with the selected filenames by the user
const updateCarouselImageInputName = () => {
    try {
        document.getElementById("carousel_images").addEventListener(
            "change",
            () => {
                const fileNames = document.getElementById("carousel_images")
                    .files;
                let newInnerhtml = "";

                for (let index = 0; index < fileNames.length; index++) {
                    const fileName = fileNames[index].name;
                    console.log(fileName);
                    newInnerhtml = newInnerhtml + "," + fileName;
                }

                document.getElementById(
                    "carousel_images_label"
                ).innerHTML = newInnerhtml;
            },
            true
        );
    } catch (error) {
        console.log("carousel image input is not found");
    }
};

updateCarouselImageInputName();
updateFileInputValue("main_image", "main_image_label");
updateFileInputValue("front_label_image", "front_label_image_label");
updateFileInputValue("user_uploaded_image", "user_uploaded_image_label");