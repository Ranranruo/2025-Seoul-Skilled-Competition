// 모토
const $motos = document.querySelector(".moto");
const $$moto = document.querySelectorAll(".moto > div");
const $text = $motos.querySelector(".text");

const state = {
    title: null,
    text: null,
    img: null
}

const render = () => {
    if(state.title == null && state.text == null && state.img == null){
        $$moto.forEach(moto => {
            const {img, title, text} = moto.dataset;
            moto.innerHTML = title;
            moto.style.backgroundImage = `url('${img}')`;
        });
        $text.innerHTML = "";
    } else {
        $$moto.forEach(moto => {
            if(moto.dataset.title != state.title) moto.innerHTML = "";
            else moto.innerHTML = state.title;
            $text.innerHTML = state.text;
            moto.style.backgroundImage = `url('${state.img}')`;
        })
    }
}

$motos.addEventListener("mouseout", (e) => {
    state.title = null;
    state.text = null;
    state.img = null;
    render();
});
$$moto.forEach(moto => {
    moto.addEventListener("mouseenter", (e) => {
        const {title, text, img} = e.target.dataset;
        state.title = title;
        state.text = text;
        state.img = img;
        render();
    });
})