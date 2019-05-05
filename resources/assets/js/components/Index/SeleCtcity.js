//import component react & npm
import React, { Component } from 'react';
import Axios from 'axios';
import {BrowserRouter as Router , Link , Route} from 'react-router-dom'






class SelectCity extends React.Component {
    constructor (props){
      super(props)
      this.state = {cityname:[],citycode:[],citys:[]};
      this.handleclick=this.handleclick.bind(this);

    }

    componentWillMount(){
        //get city
        Axios.get('http://localhost:8080/api/getcity').then((response) => {
          this.setState({
            citys : response.data,
          });
        }).catch( (error) => {
          console.log(error);
        });
      }


      handleclick(cityname,citycode){
        cookie.set('cityname', cityname, 30);
        cookie.set('citycode', citycode, 30);
        this.setState({cityname : cityname});
        this.setState({citycode : citycode});
      }

      rendercity(){
        return this.state.citys.map((city) => {
            let citycode=city.city_id;
            let cityname=city.city;
          return(
            <Cell key={city.city_id} columns={3}  >
              <Card>
                    <h5 onClick={() => this.handleclick(cityname , citycode) } >{city.city}</h5>
                    <h5>{city.city_id}</h5>
              </Card>
            </Cell>
            );
        });
      }


    render() {
      if( cookie.get('cityname') != false && cookie.get('citycode') != false){
          let cityname = cookie.get('cityname');
          let citycode = cookie.get('citycode');
        return(
        <Redirect  to={'/city/'+citycode+'/'+cityname+'/products/'+0} />
        );
      }
      return(
        <div>
        <Grid>
        <Header />
          <Row  className="menu-right-group" >
            <Cell columns={6}>HI</Cell>
            <Cell columns={6}>{this.rendercity()}</Cell>
          </Row>
        </Grid>
        </div>
      );
    }
  }
  export default SelectCity;
