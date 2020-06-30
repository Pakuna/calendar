const oCalendar = document.getElementById("calendar"),
      oCurrentMonth = document.getElementById("cMonth"),
      oClose = document.getElementById("close"),
      oMonths = document.querySelectorAll(".month")

let oActiveMonth = null

oMonths.forEach(oMonth => {
    oMonth.addEventListener("click", () => {
        oMonths.forEach(oOtherMonth => {
            if (oOtherMonth == oMonth) return
            oOtherMonth.classList.remove("active")
        })

        oMonth.classList.add("active")
        oCalendar.className = "month"
        oCurrentMonth.innerText = oMonth.dataset.month
        oClose.style.display = "block"
        oActiveMonth = oMonth
    })
})

oClose.addEventListener("click", oEvent => {
    if (!oActiveMonth) return
    oEvent.preventDefault()
    oActiveMonth.classList.remove("active")
    oCalendar.className = "year"
    oCurrentMonth.innerText = ""
})