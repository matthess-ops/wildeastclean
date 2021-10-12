const { clone } = require("lodash");


//format number to currency.
var formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "EUR"

});


// updates $$$$ name with the string the user inputted.
const getBeerbrandInputValue = () => {
    try {
        const beerbrandInput = document.getElementById("name_user");
        const backLabelText = document.getElementById("back_label_text");
        let placeholderText = backLabelText.placeholder;
        console.log(placeholderText);

        beerbrandInput.addEventListener("input", event => {
            let backText = clone(kratmeister["back_label_text"]);

            if (beerbrandInput.value != "") {
                let nameReplaced = backText.replaceAll(
                    "$$$$",
                    beerbrandInput.value
                );
                backLabelText.value = nameReplaced;
            } else {
                let nameReplaced = backText.replaceAll(
                    "$$$$",
                    "Bennie Ruighaver"
                );
                backLabelText.value = nameReplaced;
            }
        });
    } catch (error) {
        console.log("beerbrandInput input does not exis");
    }
};

// on page load set $$$$ string in back label text to Bennie Ruighaver string
const setBacklabelNameToBennie = () => {
    window.addEventListener("load", function() {
        try {
            const backLabelText = document.getElementById("back_label_text");
            let backText = clone(kratmeister["back_label_text"]);

            let nameReplaced = backText.replaceAll("$$$$", "Bennie Ruighaver");

            backLabelText.value = nameReplaced;
        } catch (error) {
            console.log("error in setBacklabelNameToBennie");
        }
    });
};

//on page load set the maximum nr of used chars to 800 characters. In next version
// just change this in the html.
const countSetInitialMaxLabelText = () => {
    window.addEventListener("load", function() {
        try {
            const backLabelText = document.getElementById("back_label_text");
            const maxChars = backLabelText.placeholder.length;
            document.getElementById("usedChars").innerHTML = maxChars;

            document.getElementById("maxChars").innerHTML = 800;
            console.log("max number of chars that can be used ", maxChars);
        } catch (error) {
            console.log("error in countSetInitialMaxLabelText");
        }
    });
};

// counts the number of characters in the Back Label text area and update the usedChars string;
const countBackLabelTextInputChars = () => {
    try {
        const backLabelText = document.getElementById("back_label_text");
        backLabelText.addEventListener("input", event => {
            document.getElementById("usedChars").innerHTML =
                backLabelText.value.length;
        });
    } catch (error) {
        console.log("backLabelText input does not exis");
    }
};

// create an option element
const createOptionChild = (name, price, id) => {
    let option = document.createElement("option");
    option.innerHTML = name + " - " + formatter.format(price); /* $2,500.00 */
    option.value = id;
    return option;
};

let selectedPackageSize = "single_can_price";
let selectedStickerPrice = 1.0;

// Set default selected sticker price.

const setDefaultselectedStickerPrice = () => {
    window.addEventListener("load", function() {
        try {
            let beerBrandSelect = document.getElementById("beerBrandSelect");
            beerBrandSelect.innerHTML = "";
            beerBrandSelect.appendChild(
                createOptionChild("Alleen stickers", 0, "no_beer")
            );

            beerbrands.forEach(beerbrand => {
                if (beerbrand["single_can_price"] != 0) {
                    const brandAndPrice =
                        beerbrand.beerbrand +
                        " " +
                        beerbrand["single_can_price"];
                    beerBrandSelect.appendChild(
                        createOptionChild(
                            beerbrand.beerbrand,
                            beerbrand["single_can_price"],
                            beerbrand.id
                        )
                    );
                }
            });
        } catch (error) {}
    });
};

// listen to change in selected packageSize. Then for the selected Package, change
// the beerbrand list. Example. A packageSize sixpack, comes in the brands heineken, grolsch,
//however a packagesize of large bottle 0.75 liter only comes in the brand grolsch. Therefore
//if the user changes between packageSize the beerbrand list needs to be updated/
const getSelectedPackageSize = () => {
    try {
        document
            .getElementById("packageSize")
            .addEventListener("change", event => {
                let beerBrandSelect = document.getElementById(
                    "beerBrandSelect"
                );
                beerBrandSelect.innerHTML = "";
                beerBrandSelect.appendChild(
                    createOptionChild("Alleen stickers", 0, "no_beer")
                );
                selectedStickerPrice = kratmeister[event.target.value];
                selectedPackageSize = event.target.value; //global keeps track of selected package size
                let select = document.getElementById("totalPrice");
                select.innerHTML = formatter.format(
                    kratmeister[event.target.value]
                );

                beerbrands.forEach(beerbrand => {
                    // if the beerbrand[packageSize/event.target.value] == 0. This means that
                    // the packagSize for this brand does not exist. Therefore it should not be
                    //added to the beerbrands select list.
                    if (beerbrand[event.target.value] != 0) {
                        const brandAndPrice =
                            beerbrand.beerbrand +
                            " " +
                            beerbrand[event.target.value];
                        beerBrandSelect.appendChild(
                            createOptionChild(
                                beerbrand.beerbrand,
                                beerbrand[event.target.value],
                                beerbrand.id
                            )
                        );
                    }
                });
            });
    } catch (error) {
        console.log("Error in get package size");
    }
};

// add all the different packaging sizes to  packageSize select element.
// i do this in javascript instead of php because i wanted to use the js currency formatter
// however i could have also use the php money_formatter in the view
const addPackageSizeOptions = () => {
    window.addEventListener("load", function() {
        try {
            let select = document.getElementById("packageSize");
            select.appendChild(
                createOptionChild(
                    "Enkel blikje 3cl",
                    kratmeister.single_can_price,
                    "single_can_price"
                )
            );
            select.appendChild(
                createOptionChild(
                    "Enkel flesje 3cl",
                    kratmeister.single_small_bottle_price,
                    "single_small_bottle_price"
                )
            );
            select.appendChild(
                createOptionChild(
                    "Enkele fles 75cl",
                    kratmeister.single_large_bottle_price,
                    "single_large_bottle_price"
                )
            );
            select.appendChild(
                createOptionChild(
                    "Sixpack blikjes 3cl",
                    kratmeister.sixpack_can_price,
                    "sixpack_can_price"
                )
            );
            select.appendChild(
                createOptionChild(
                    "Sixpack flesjes 3cl",
                    kratmeister.sixpack_bottle_price,
                    "sixpack_bottle_price"
                )
            );
            select.appendChild(
                createOptionChild(
                    "Krat bier 3cl",
                    kratmeister.beercase_price,
                    "beercase_price"
                )
            );
        } catch (error) {}
    });
};

// set op page load the total price to the lowest price. This will be
// kratmeister.single_can_price
const changeTotalPriceToLowestStickerPrice = () => {
    window.addEventListener("load", function() {
        try {
            let select = document.getElementById("totalPrice");
            select.innerHTML = formatter.format(kratmeister.single_can_price);
        } catch (error) {}
    });
};


// When an customer clicks on the reset button. The text in in back_label_Text textarea
// is reset the default text.
const resetText = () => {
    const resetButton = document.getElementById("reset");
    resetButton.addEventListener("click", () => {
        const usedChars = document.getElementById("usedChars")
        const beerbrandInput = document.getElementById("name_user");
        const backLabelText = document.getElementById("back_label_text");

        let backText = clone(kratmeister["back_label_text"]);
        usedChars.innerHTML = 0;

        if (beerbrandInput.value != "") {
            let nameReplaced = backText.replaceAll(
                "$$$$",
                beerbrandInput.value
            );
            backLabelText.value = nameReplaced;
        } else {
            let nameReplaced = backText.replaceAll("$$$$", "Bennie Ruighaver");
            backLabelText.value = nameReplaced;
        }
    });
};

//adds/subtracts the selected beerbrand price to the  totalprice, which consists out of the
//selectedStickerPrice and beerbrand price.
const addBeerBrandOptionPriceToTotalPrice = () => {
    try {
        const beerBrandSelect = document.getElementById("beerBrandSelect");
        let totalPrice = document.getElementById("totalPrice");
        beerBrandSelect.addEventListener("change", event => {
            if (event.target.value != "no_beer") {
                // if the user doesnt want to have beer the id is no_beer which doesnt exist in the beerbrands json
                const beerbrandOfInterest = beerbrands.filter(
                    beerbrand => beerbrand.id == event.target.value
                );

                totalPrice.innerHTML = formatter.format(
                    parseFloat(selectedStickerPrice) +


                    parseFloat(beerbrandOfInterest[0][selectedPackageSize])
                );
            } else {
                totalPrice.innerHTML = formatter.format(selectedStickerPrice);
            }
        });
    } catch (error) {
        console.log("error in addBeerBrandOptionPriceToTotalPrice");
    }
};

resetText();
setBacklabelNameToBennie();
countSetInitialMaxLabelText();
countBackLabelTextInputChars();
getBeerbrandInputValue();
// getSelectedPackageSize();
// changeTotalPriceToLowestStickerPrice();
// addPackageSizeOptions();
// addBeerBrandOptionPriceToTotalPrice();
// setDefaultselectedStickerPrice();
