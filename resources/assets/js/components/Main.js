//import component react & npm
import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import Axios from 'axios'
import {BrowserRouter as Router , Link , Route} from 'react-router-dom'
import {Cell, Grid, Row} from '@material/react-layout-grid'



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

  render() {
    return (
    <Router>
        <div>

        <Grid>
        <Row>
          <Cell columns={12} className="header"><Header /></Cell>
        </Row>
        <Row>
          <Cell  order={2} phoneColumns={4} tabletColumns={4} className="MenuRight mdc-layout-grid__cell--span-5-desktop}"><MenuRight categorys={this.state.categorys} /></Cell>

          <Cell  order={3} phoneColumns={4} tabletColumns={4} className="card-search"><Search /></Cell>
          <Cell  order={1} phoneColumns={4} tabletColumns={4} className="component-body"><Body title="amin" /></Cell>
      </Row>
        
        </Row>
      </Grid>




        <div className="row">
          <div className="col-18 col-md-12 "></div>
        </div>
        <div className="row">
          <div className="col-2 MenuRight"></div>
            <div className="col-10 col-md-9">
              <div className=" card-search col-10 col-md-10 "></div>
              <div className="col-5 col-md-3 component-body"></div>
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
