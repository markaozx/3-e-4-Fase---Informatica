import {View, Text, Image, StyleSheet, TextInput, FlatList} from 'react-native';
import { Button, ImageBackground } from 'react-native-web';
import { useState } from 'react';
import Card from './Card';

export default function Home() {

  const [data, setData] = useState([
      {id: 1, nome: 'LB-WORKS Ferrari F8 Tributo', preco: 50050, foto: 'https://libertywalk.co.jp/wp-content/uploads/2024/06/LB-WORKS-F8-Tributo00004-1.jpg'},
          {id: 2, nome: 'LB-WORKS TOYOTA SUPRA (A90)', preco: 19300, foto: 'https://libertywalk.co.jp/wp-content/uploads/2025/01/SUPRA-1024x683-1.jpg'},
          {id: 3, nome: 'LB★PERFORMANCE Lamborghini AVENTADOR', preco: 31400, foto: 'https://libertywalk.co.jp/wp-content/uploads/2023/02/PERFORMANCE-Lamborghini-AVENTADOR00005-1024x683.jpg'},
          {id: 4, nome: 'LB-ER34 Super Silhouette SKYLINE', preco: 46730, foto: 'https://libertywalk.co.jp/wp-content/uploads/2022/10/ER34_silhouette-1024x683.jpg'},
      ]);
  return(
    <ImageBackground source={{uri: 'https://cdn.vectorstock.com/i/1000v/27/82/triangle-gradient-background-in-black-and-white-vector-8722782.jpg'}} style= {{width: '100%', height: '100%'}}>
    <View style={styles.container}>
    <View style={styles.viewimg}>
      <Image style={styles.logo1}source={require('../assets/logo.png')}/>
      </View>
      <Text style={styles.titulo}>Liberty Walk</Text>
      <Text style={styles.txt1}>"Liberty Walk" continua a espalhar a mundialmente renomada cultura de personalização "Works Style" do Japão para o mundo</Text>
      <Text style={styles.txt3}>LIBERTY WALK OFFICIAL STORE</Text>
      <View style={styles.viewimg2}>
      <Image style={styles.img1}source={{uri: 'https://libertywalk.co.jp/wp-content/uploads/2024/07/Maiami2-1536x1024.jpg'}}/>
      <Image style={styles.img1}source={{uri: 'https://libertywalk.co.jp/wp-content/uploads/2024/07/TOKYO-STORE.jpg'}}/>
      </View>
      <View style={styles.viewimg2}>
      <Image style={styles.img1}source={{uri: 'https://libertywalk.co.jp/wp-content/uploads/2024/03/AJ2I4221ab-1536x1024.jpg '}}/>
      <Image style={styles.img1}source={{uri: 'https://libertywalk.co.jp/wp-content/uploads/2024/07/OSAKA-2nd-STORE.jpg'}}/>
      </View>
      <Text style={styles.txt}>Liberty Walk é uma marca de customização de carros, criada pelo japonês Wataru Katu.</Text>
      <Text style={styles.txt2}>A marca é conhecida por suas personalizações de carros, que incluem mudanças de estilo, performance e tecnologia.</Text>

      
      <Text style={styles.credito}>Direitos autorais Liberty Walk ©
      2025</Text>
      {/* <TextInput
      style={styles.txtinput}
      placeholder='Nome'
      placeholderTextColor={'black'}
      />
      <TextInput
      style={styles.txtinput}
      placeholder='Mensagem'
      placeholderTextColor={'black'}
      />
      <Button
      title="Enviar"
      color='blue'
      /> */}
    </View>
    </ImageBackground>
    )
}

const styles = StyleSheet.create({
    container: {
      flex: 1,
      width: '100%',
      padding: 25,
      paddingTop: 5,
      color: 'black',
    },
    back: {
      width: '100%',
      height: '100%',
    },
    viewimg: {
      paddingTop: 5,
      paddingBottom: 5,
      alignItems: 'flex-end',
    },

    logo1: { 
      width: 35,
      height: 35,
      position: 'absolute',
    },

    img1: { 
      width: 185,
      height: 185,
    },
    
    txt: {
      color:'white',
      paddingTop: 10,
      fontSize: 20,
      alignSelf: 'flex-start',
      width: 270,
    },

    txt2: {
      color:'white',
      paddingTop: 10,
      fontSize: 20,
      alignSelf: 'flex-end',
      width: 270,
    },

    txt1: {
      color:'black',
      fontStyle: 'italic',
      fontWeight: 'bold',
      fontSize: 20,
      alignSelf: 'center',
      width: 365,
    },
    txt3: {
      color:'black',
      fontWeight: 'bold',
      fontSize: 23,
      alignSelf: 'center',
      width: 365,
    },
    
    titulo: {
      color:'black',
      fontWeight: 'bold',
      fontFamily: 'Trattatello',
      fontSize: 30,
    },

    viewimg2: {
      paddingTop: 5,
      paddingBottom: 5,
      flexDirection: 'row',
      justifyContent: 'space-between',
    },

    credito: { 
      paddingTop: 20,
      color: 'white',
      fontSize: 15,
      alignSelf: 'center',
    },

    // txtinput: {
    //   padding: 5,
    //   height: 30,
    //   borderColor: 'black',
    //   borderWidth: 1,
    //   borderRadius: 3,
    // }
});
