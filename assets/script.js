document.addEventListener("DOMContentLoaded", () => {

    const fileInput = document.querySelector(
        'input[type="file"]'
    );

    if(fileInput){

        fileInput.addEventListener("change", () => {

            const file = fileInput.files[0];

            if(!file) return;

            const allowed = [
                "image/jpeg",
                "image/png",
                "image/webp",
                "image/gif"
            ];

            if(!allowed.includes(file.type)){

                alert(
                    "Only JPG, PNG, WEBP and GIF allowed"
                );

                fileInput.value = "";
            }

        });

    }

});