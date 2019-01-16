//import component react & npm
import React, { Component } from 'react';
//import component me


class Header extends Component {
    constructor (props){
      super(props)
    }
    render(){
      return (
        <div className="row">
          <div className="col-18 col-md-8 headerRight">
            <nav className="nav">
              <a className="nav-link active"><i className="material-icons">home</i></a>
              <a className="nav-link" href="#">قوانین</a>
              <a className="nav-link" href="#">درباره ما</a>
              <a className="nav-link" href="#">تماس با ما</a>
            </nav>
        </div>
          <div className="col-6 col-md-3 headerLeft">
            <button type="button" className="btn btn-primary">ثبت رایگاه آگهی</button>
          </div>
        </div>
      );
    }
}
export default Header;
