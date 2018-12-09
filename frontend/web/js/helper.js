'use strict';

function err(file, func, msg) {
  const message = `Error happens in file: ${file}, with func: ${func}. Msg: ${msg}.`;
  console.error(message);
}

function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}

