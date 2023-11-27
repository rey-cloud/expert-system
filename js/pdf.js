window.onload = function () {
  document.getElementById("download").addEventListener("click", () => {
    const element = document.getElementById("invoice"); // Capture the entire page

    html2pdf()
      .from(element)
      .set({
        filename: 'sq_result.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 5 },
        jsPDF: { unit: 'mm', format: 'a3', orientation: 'portrait' },
      })
      .save();
  });
}
