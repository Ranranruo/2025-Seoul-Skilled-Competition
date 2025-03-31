// 모토
const $moto = document.querySelector(".moto");
const $motoText = document.querySelector("#moto-text");
const $$moto = document.querySelectorAll(".moto > div");
$$moto.forEach(el => el.addEventListener("mouseenter", (e) => {
    $$moto.forEach(div => {
        div.style.backgroundImage = `url('./image/${e.target.dataset.name}.jpg')`;
        div.innerHTML = "";
    });
    e.target.innerHTML = e.target.dataset.name;
    $motoText.innerHTML = e.target.dataset.text;
}));
$moto.addEventListener("mouseout", (e) => {
    $$moto.forEach(el => el.style.backgroundImage = `url('./image/${el.dataset.name}.jpg')`)
    $$moto.forEach(el => el.innerHTML = el.dataset.name);
    $motoText.innerHTML = "";
});