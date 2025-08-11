// resources/js/Eksternal.js

window.showModal = function (role) {
    const modal = document.getElementById("modal");
    const modalTitle = document.getElementById("modalTitle");
    const modalImage = document.getElementById("modalImage");

    const content = {
        ketua: { title: "Ketua HMPS", img: "./images/khm.jpeg" },
        wakil_ketua: { title: "Wakil Ketua HMPS", img: "./images/wkhm.jpeg" },
        ctrl: { title: "Control Internal", img: "/images/ctrl.jpeg" },
        sekretaris: { title: "Sekretaris", img: "./images/skum.jpeg" },
        bendahara: { title: "Bendahara", img: "./images/bndum.jpeg" },
        inter: { title: "Kadiv Internal", img: "./images/kdvin.jpeg" },
        ekster: { title: "Kadiv Eksternal", img: "./images/kdveks.jpeg" },
        psdm: { title: "Kadiv PSDM", img: "./images/kdvps.jpeg" },
        bd: { title: "Kadiv BD", img: "./images/kdvbd.jpeg" },
        iptk: { title: "Kadiv IPETK", img: "./images/kdvip.jpeg" },
    };

    if (content[role]) {
        modalTitle.textContent = content[role].title;
        modalImage.src = content[role].img;
    } else {
        modalTitle.textContent = "Tidak ditemukan";
        modalImage.src = "";
    }

    modal.classList.remove("hidden");
    modal.classList.add("flex");
};

window.closeModal = function () {
    const modal = document.getElementById("modal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
};

// BAGIAN HERO IMAGE ROTATION
document.addEventListener("DOMContentLoaded", () => {
    const heroImage = document.getElementById("heroImage");
    const defaultImage = "/images/hmps1.jpeg";
    const rotateImages = [
        "/images/hmps1.jpeg",
        "/images/hmps2.jpeg",
        "/images/hmps3.jpeg",
        "/images/hmps4.jpeg",
    ];

    let rotationInterval;
    let currentIndex = 0;

    window.startImageRotation = () => {
        rotationInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % rotateImages.length;
            heroImage.style.backgroundImage = `url('${rotateImages[currentIndex]}')`;
        }, 1000);
    };

    window.stopImageRotation = () => {
        clearInterval(rotationInterval);
        heroImage.style.backgroundImage = `url('${defaultImage}')`;
    };
});

document.addEventListener("DOMContentLoaded", function () {
    let roleSelect = document.getElementById("role");
    let teamNameField = document.getElementById("teamNameField");

    function toggleTeamNameField() {
        if (roleSelect.value === "Kepala Divisi") {
            teamNameField.style.display = "none";
        } else {
            teamNameField.style.display = "block";
        }
    }

    roleSelect.addEventListener("change", toggleTeamNameField);
    toggleTeamNameField(); // jalankan pertama kali
});
