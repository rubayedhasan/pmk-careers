// get elements
const subscribeButton = document.querySelector("#subscribe-btn");
const emailField = document.querySelector("#input-email");

// get data from localStorage and extract theJSON format
const getTheAddress = () => {
  const address = window.localStorage.getItem("userAddress");
  if (address) {
    return JSON.parse(address);
  }

  return [];
};

// store data in localStorage in JSON format
const storeTheAddress = (addr) => {
  const composedAddress = JSON.stringify(addr);
  window.localStorage.setItem("userAddress", composedAddress);
};

// insert the new data to previous
const addTheAddress = (newAddr) => {
  const theAddress = getTheAddress();
  theAddress.push(newAddr);

  storeTheAddress(theAddress);
};

// button event
subscribeButton.addEventListener("click", (e) => {
  // prevent form default behavior
  e.preventDefault();

  //   inset data
  const address = emailField.value;
  addTheAddress(address);

  //   clear the input
  emailField.value = "";
});
