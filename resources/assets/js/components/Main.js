//import component react & npm
import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import Axios from 'axios'
import {BrowserRouter as Router , Link , Route} from 'react-router-dom'


//import component me
import Header from './App/Header'
import MenuRight from './App/MenuRight'
import Search from './App/Search'
import Body from './App/Body'
import Aboute from './App/Aboute'

// import Footer from './App/Footer'


export default class Exam extends React.Component {
  constructor (props){
    super(props)
    this.state = {categorys:[]};
  }

  componentDidMount(){
    Axios.get('api/category').then((response) => {
      this.setState({
        categorys : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });
  }

  render() {
    return (
    <Router>
        <div>
        <div className="row">
          <div className="col-18 col-md-12 header"><Header /></div>
        </div>
        <div className="row">
          <div className="col-2 MenuRight"><MenuRight categorys={this.state.categorys}  /></div>
            <div className="col-10 col-md-9">
              <div className=" card-search col-10 col-md-10 "><Search /></div>
              <div className="col-5 col-md-3 component-body"><Body title="amin" /></div>
            </div>
        </div>
          <Route exact path='/' />
          <Route  path='/Aboute' component={Aboute} />
        </div>
        </Router>
    );
  }
}
ReactDOM.render(<Exam />, document.getElementById('root'));
