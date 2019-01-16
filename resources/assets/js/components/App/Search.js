import React, { Component } from 'react';

//import component me


class Search extends Component {
    constructor (props){
      super(props)
      
    }
    render(){
      return (
        <div>
          <form>
            <div className="form-row">
              <div className="col-7">
                <label> جستو جو:
                  <input name="search" type="text" className="form-control" placeholder="دنبال چی میگردی ..." />
                </label>
            </div>
              <div className="col">
                <label> عناوین :
                  <select name="category">
                    <option value="1">املاک</option>
                    <option value="1">املاک</option>
                    <option value="1">املاک</option>
                    <option value="1">املاک</option>
                  </select>
                </label>
              </div>
              <div className="col">
                <label> شهر :
                  <input  name="city" type="text" className="form-control" placeholder=" اصفهان" />
                </label>
              </div>
              <button type="button" className="btn btn-primary bottom-search">جست و جو</button>
            </div>
          </form>

        </div>
      );
    }
}
export default Search;
