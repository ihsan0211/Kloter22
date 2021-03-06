let x = "alagcgcdodol";

const  duplicate = (str) => {
    str = Array.from(new Set(str.split(''))).toString().replace(/,/g, '');
    console.log(str);
}
duplicate(x);