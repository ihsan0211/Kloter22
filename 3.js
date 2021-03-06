const cetak_gambar = (num) => {
    for(let i = 1; i <= num; i++) {
        let output = "";
        for(let j = 1; j <= num; j++) {
            if(i == 1 || i == num){
                output += "+";
            } else if (j % 3 == 0) {
                output += "+";
            } else if (j % 3 != 0) {
                output += "=";
            }
        }
        console.log(output);
    };
};
cetak_gambar(8);

