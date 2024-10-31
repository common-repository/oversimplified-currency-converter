document.addEventListener("DOMContentLoaded", () => {
  for (let currency_converter of document.querySelectorAll(".oversimplified_currency_converter_container")) {
    let inputs = {
      from: currency_converter.querySelector(".oversimplified_currency_converter_from"),
      to: currency_converter.querySelector(".oversimplified_currency_converter_to"),
    }

    let from = oversimplified_currency_converter_lib[currency_converter.dataset.from]
    let to = oversimplified_currency_converter_lib[currency_converter.dataset.to]

    console.log(from)
    console.log(to)

    if (from == undefined || to == undefined) {
      continue
    }

    currency_converter.querySelector(".oversimplified_currency_converter_unit_from").innerText = from.sign
    currency_converter.querySelector(".oversimplified_currency_converter_unit_to").innerText = to.sign

    inputs.from.addEventListener("input", () => {
      let value1 = Number(inputs.from.value)

      let dollarworth1 = value1 * from.dollarworth

      let result = dollarworth1 / to.dollarworth

      inputs.to.value = result.toFixed(2)
    })
    inputs.to.addEventListener("input", () => {
      let value2 = Number(inputs.to.value)

      let dollarworth2 = value2 * to.dollarworth

      let result = dollarworth2 / from.dollarworth

      inputs.from.value = result.toFixed(2)
    })

  }
})

const oversimplified_currency_converter_lib = {
  us_dollar: {
    sign: "$",
    dollarworth: 1
  },
  dollar: {
    sign: "$",
    dollarworth: 1
  },
  euro: {
    sign: "€",
    dollarworth: 1.14
  },
  gbp: {
    sign: "£",
    dollarworth: 1.34
  },
  yen: {
    sign: "¥",
    dollarworth: 0.008769
  },
  inr: {
    sign: "₹",
    dollarworth: 0.013421
  }
}
