const fetchingData = async () => await fetch("./product.json").then(data=>data.json());

const render = async () => {
    const data = await fetchingData();
}