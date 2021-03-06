const urutKata = (str) => {
    let words = str.split(" ");
    let arr = [];
    for(let num = 1; num <= words.length; num++){
        let i = num.toString();
        words.forEach(element => {
            if(element.includes(i)) {
                arr.push(element);

            }
        });
    }
    console.log(arr)
}

urutKata("ta3hun menjela2ng se1lamat b4aru");