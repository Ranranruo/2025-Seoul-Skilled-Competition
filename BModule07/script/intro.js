// 모토
const moto = () => {
    const $$moto = document.querySelectorAll(".moto");
    const $text = document.querySelector(".text");
    const state = new Proxy({
        title: '',
        text: ''
    }, {
        set(obj, prop, value) {
            obj[prop] = value;
            render();
        }
    });
    $$moto.forEach(moto => {
        moto.addEventListener("mouseenter", (e) => {
            state.title = moto.dataset.title;
            state.text = moto.dataset.text; 
        });
        moto.addEventListener("mouseleave", (e) => {
            state.title = "";
            state.text = "";
        })
    })
    // 렌더
    const render = () => {
        $$moto.forEach(moto => {
            if(state.title == "") {
                moto.innerHTML = moto.dataset.title;
                moto.style.backgroundImage = `url('./images/${moto.dataset.title}.jpg')`;
                $text.innerHTML = "";
            } else {
                moto.innerHTML = moto.dataset.title == state.title ? moto.dataset.title : '';
                moto.style.backgroundImage = `url('./images/${state.title}.jpg')`;
                $text.innerHTML = state.text;
            }
        })
    }
    render();
}
moto();