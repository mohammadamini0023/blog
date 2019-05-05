//import component react & npm
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Router ,Route,Switch } from 'react-router-dom';
import { createBrowserHistory } from "history";
//imnport material
//import component me
import Index from './Index/Index'
import Aboute from './Index/Aboute'
import IndexSelectCategory from './IndexSelectCategory/IndexSelectCategory'
import ShowSingleProduct from './SingleProduct/ShowSingleProduct'

export default class Exam extends React.Component {
  constructor (props){
    super(props)
  }
  render() {
    return (
      <Router history={createBrowserHistory()}>
        <div>
            <Switch>
                //route index page site
                <Route exact path='/'  component={Index}  />
                //route show single product
                <Route path='/product/:Product_id/:ProductName'  component={ShowSingleProduct} />
                //route select category
                <Route path='/:CategoryName/:Category_id'  component={IndexSelectCategory} />



                //route aboute page
                <Route path="/Aboute" component={Aboute} />

                <Route  path='/products/:categoryproducts'  component={Index} />
            </Switch>
        </div>
      </Router>
    );
  }
}
ReactDOM.render(<Exam />, document.getElementById('root'));
