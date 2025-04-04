const moto = () => {
    const $motos = document.querySelector(".motos");
    const $$moto = document.querySelectorAll(".moto");
    const $motoText = document.querySelector("#motoText");
    const state = new Proxy({
        title: null,
        text: null,
    }, {
        set(obj, prop, value) {
            obj[prop] = value;
            render();
        }
    })
    $motos.addEventListener("mouseleave", (e) => {
        state.title = null;
        state.text = null;
    })
    $$moto.forEach(moto => moto.addEventListener("mouseenter", (e) => {
        state.title = e.target.dataset.title;
        state.text = e.target.dataset.text;
    }));
    const render = async () => {
        $$moto.forEach(moto => {
            if(state.title == null) {
                moto.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), url('./images/${moto.dataset.title}.jpg')`;
                moto.innerHTML = moto.dataset.title;
                $motoText.innerHTML = "";
            } else {
                moto.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), url('./images/${state.title}.jpg')`;
                moto.innerHTML = moto.dataset.title == state.title ? state.title : '';
                $motoText.innerHTML = state.text;
            }
        })
    }

    const setEvent = () => {

    }
    const getHtml = () => {

    }
    render();
}
moto();