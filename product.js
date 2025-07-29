function nightMode() {
    document.getElementById('img_day').style.display = 'none';
    document.getElementById('img_dark').style.display = 'block';

    const root = document.querySelector(':root');
    root.style.setProperty('--c1', '#0E0B16');
    root.style.setProperty('--c4', '#E7DFDD');
    root.style.setProperty('--c5white', 'white');
    root.style.setProperty('--c6black', 'black');
    root.style.setProperty('--c3', '#4717F6');
    root.style.setProperty('--c2', '#A239CA');
  }

  function dayMode() {
    document.getElementById('img_dark').style.display = 'none';
    document.getElementById('img_day').style.display = 'block';

    const root = document.querySelector(':root');
    root.style.setProperty('--c1', 'white');
    root.style.setProperty('--c4', '#efefef');
    root.style.setProperty('--c5white', 'black');
    root.style.setProperty('--c6black', 'white');
    root.style.setProperty('--c3', '#caebf2');
    root.style.setProperty('--c2', '#caebf2');
  }

  function showQuantityInput() {
    const productInfoSection = document.querySelector(".product-info");

    
      const quantityInputDiv = document.createElement("div");
      quantityInputDiv.id = "quantityInputDiv";
      quantityInputDiv.style.marginTop = "20px";
      quantityInputDiv.style.fontSize = "18px";

      quantityInputDiv.innerHTML = `
        <label for="quantity" style="font-size: 16px; margin-right: 10px;"><strong>Enter Quantity:</strong></label>
        <input type="number" id="quantity" value="1" min="1" style="width: 50px; margin-right: 10px;">
        <button id="calculateCostButton" style="padding: 5px 10px; font-size: 14px;">Calculate</button>
        <div id="costResult" style="margin-top: 10px; font-size: 16px;"></div>
        <br>
        <label for="discount" style="font-size: 16px; margin-right: 10px;"><strong>Enter Discount Percentage:</strong></label>
        <input type="number" id="discount" min="0" max="100" style="width: 50px; margin-right: 10px;">
        <button id="applyDiscountButton" style="padding: 5px 10px; font-size: 14px;" onclick="applyDiscount()">Apply Discount</button>
        <button id="resetButton" style="padding: 5px 10px; font-size: 14px;" onclick="resetFields()">Reset</button>
      `;

      productInfoSection.appendChild(quantityInputDiv);

      document.getElementById("calculateCostButton").addEventListener("click", calculateCost);
      document.getElementById("btnAddCart").onclick = null;
    
  }

  function calculateCost() {
    const pricePerUnit = 1.99;
    const taxRate = 0.19; // 19% tax rate
    const quantity = parseInt(document.getElementById("quantity").value);

    if (isNaN(quantity) || quantity <= 0) {
      alert("Please enter a valid quantity.");
      return;
    }

    const totalCost = pricePerUnit * quantity;
    const totalWithTax = totalCost * (1 + taxRate);

    const costResultDiv = document.getElementById("costResult");
    costResultDiv.innerHTML = `
      <strong>Total Cost:</strong> $${totalCost.toFixed(2)}<br>
      <strong>Total Cost (with 19% Tax):</strong> $${totalWithTax.toFixed(2)}
    `;
  }

  function applyDiscount() {
    const pricePerUnit = 1.99;
    const taxRate = 0.19; // 19% tax rate
    const quantity = parseInt(document.getElementById("quantity").value);
    const discount = parseFloat(document.getElementById("discount").value);

    if (isNaN(quantity) || quantity <= 0) {
      alert("Please enter a valid quantity.");
      return;
    }

    if (isNaN(discount) || discount < 0 || discount > 100) {
      alert("Please enter a valid discount percentage (0-100).");
      return;
    }

    const totalCost = pricePerUnit * quantity;
    const discountedPrice = totalCost - (totalCost * (discount / 100));
    const totalWithTax = discountedPrice * (1 + taxRate);

    const costResultDiv = document.getElementById("costResult");
    costResultDiv.innerHTML = `
      <strong>Total Cost:</strong> $${totalCost.toFixed(2)}<br>
      <strong>Total Cost (with 19% Tax):</strong> $${totalWithTax.toFixed(2)}<br>
      <strong>Discount Applied:</strong> ${discount}%<br>
      <strong>Total Cost with discount (with 19% Tax):</strong> $${discountedPrice.toFixed(2)}
    `;
  }

  function resetFields() {
    document.getElementById("quantity").value = "1";
    document.getElementById("discount").value = "";
    const costResultDiv = document.getElementById("costResult");
    costResultDiv.innerHTML = "";
  }