class StyleClass {
  constructor(backgroundColor="antiquewhite") {
    this._backgroundColor = backgroundColor;
  }

  getBackgroundColor() {
    return this._backgroundColor;
  }

  setBackgroundColor(kivalasztottSzin) {
    this._backgroundColor = kivalasztottSzin;
  }

}

const styleClass = new StyleClass();