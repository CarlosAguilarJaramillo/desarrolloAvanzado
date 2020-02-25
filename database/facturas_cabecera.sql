CREATE TABLE [dbo].[facturas_cabecera](
	[idfaccab] [int] IDENTITY(1,1) NOT NULL,
	[idpedcab] [int] NULL,
	[vendedor] [varchar](50) NULL,
	[cliente] [varchar](50) NULL,
	[direccion] [varchar](250) NULL,
	[subtotal] [decimal](10, 2) NULL,
	[valor_impuesto] [decimal](10, 2) NULL,
	[total] [decimal](10, 2) NULL,
	[fecha] [date] NULL,
 CONSTRAINT [PK_facturas_cabecera] PRIMARY KEY CLUSTERED 
(
	[idfaccab] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
