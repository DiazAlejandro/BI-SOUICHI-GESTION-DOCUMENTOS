function download(){
    const invoice = this.document.getElementById("content");
    var opt = {
        margin: 0.5,
        filename: 'REGISTRO_OBRA.pdf',
        image: { type: 'png', quality: 1.00 },
        jsPDF: { unit: 'in', format: 'letter'}
    };
    html2pdf().from(invoice).set(opt).save();
}