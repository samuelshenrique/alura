const Logo = ({...rest}: React.ImgHTMLAttributes<HTMLImageElement>) => {
  return (
    <img {... rest} />
  )
}

export default Logo